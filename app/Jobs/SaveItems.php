<?php

namespace App\Jobs;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ClientLogos;
use App\Models\Discount;
use App\Models\Galerie;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Products;
use App\Models\ProductTag;
use App\Models\Specifications;
use App\Models\SubCategory;
use App\Models\Tag;

use Illuminate\Support\Str;
use SoDe\Extend\File;
use SoDe\Extend\JSON;
use SoDe\Extend\Text;

class SaveItems implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  private array $items;
  private string $image_route_pattern;

  public function __construct(array $items, string $image_route_pattern)
  {
    $this->items = $items;
    $this->image_route_pattern = $image_route_pattern;
  }

  public function handle()
  {

    $path2search = "./storage/images/products/";

    $images = [];
    try {
      $images = File::scan($path2search);
    } catch (\Throwable $th) {
      dump($th->getMessage());
    }

    try {
      Category::where('visible', 1)->update(['visible' => 0]);
      SubCategory::where('visible', 1)->update(['visible' => 0]);
      ClientLogos::where('visible', 1)->update(['visible' => 0]);
    } catch (\Throwable $th) {
      dump($th->getMessage());
    }

    try {
      Specifications::whereNotNull('id')->delete();
      Galerie::whereNotNull('id')->delete();
      Products::truncate();
    } catch (\Throwable $th) {
      dump('Error: ' . $th->getMessage());
    }

    dump('Inició la carga masiva: ' . count($this->items) . ' items');

    foreach ($this->items as $item) {
      try {
        $imageRoute = \str_replace('{1}', $item[1], $this->image_route_pattern);
        $imageRoute = \str_replace('{8}', $item[8], $imageRoute);

        $productImages = \array_filter($images, fn($image) => Text::startsWith($image, $imageRoute));


        // Searching or Creating a Category
        $categoryJpa = Category::updateOrCreate([
          'name' => $item[5]
        ], [
          'name' => $item[5],
          'slug' => Str::slug($item[5]),
          'visible' => 1
        ]);
        // if (!$categoryJpa) {
        //   $categoryJpa = Category::create([
        //     'name' => $item[5],
        //     'slug' => Str::slug($item[5])
        //   ]);
        // }

        // Searching or Creating a Subcategory
        // $subcategoryJpa = SubCategory::select()
        //   ->where('category_id', $categoryJpa->id)
        //   ->where('name', $item[6])
        //   ->first();

        // $subcategoryJpa = SubCategory::updateOrCreate([
        //   'category_id' => $categoryJpa->id,
        //   'name' => $item[6]
        // ], [
        //   'category_id' => $categoryJpa->id,
        //   'name' => $item[6],
        //   'slug' => Str::slug($item[6]),
        //   'visible' => 1
        // ]);

        // if (!$subcategoryJpa) {
        //   $subcategoryJpa = SubCategory::create([
        //     'category_id' => $categoryJpa->id,
        //     'name' => $item[6],
        //     'slug' => Str::slug($item[6])
        //   ]);
        // }

        // Searching or Creating a Brand
        // $brandJpa = ClientLogos::where('title', $item[7])->first();
        // if (!$brandJpa) {
        //   $brandJpa = ClientLogos::create(['title' => $item[7]]);
        // }

        // $brandJpa = ClientLogos::updateOrCreate([
        //   'title' => $item[7]
        // ], [
        //   'title' => $item[7],
        //   'visible' => 1
        // ]);

        $discountJpa = Discount::where('name', '=', $item[11])->where('status', true)->first();

        $price = $item[6];
        $discount = $item[7] ?? 0;

        if ($discount > 0) {
          $percent = (1 - ($discount / $price)) * 10;
        } else {
          $percent = 0;
        }

        $productJpa = Products::updateOrCreate([
          'sku' => $item[0],
        ], [
          'codigo' => $item[1],
          'producto' => $item[2],
          'extract' => $item[3],
          'description' => $item[4],
          'categoria_id' => $categoryJpa->id,
          // 'subcategory_id' => $subcategoryJpa->id,
          // 'marca_id' => $brandJpa->id,
          'precio' => $item[6],
          'descuento' => $item[7] ?? 0,
          'color' => $item[8],
          'peso' => $item[9],
          'stock' => $item[10],
          'medidas' => $item[12],
          'usos' => $item[13],
          'discount_id' => $discountJpa?->id,
          'visible' => 1,
          'percent_discount' => $percent
        ]);

        $i = 0;
        Galerie::where('product_id', $productJpa->id)->delete();

        if (\count($productImages) == 0) {
          $productJpa->visible = 0;
          $productJpa->save();
        }

        foreach ($productImages as $image) {
          try {
            $productImage = 'storage/images/products/' . $image;
            if ($i == 0) {
              $productJpa->imagen = $productImage;
              $productJpa->save();
            } else {
              Galerie::updateOrCreate([
                'product_id' => $productJpa->id,
                'imagen' => $productImage
              ]);
            }
          } catch (\Throwable $th) {
            dump($th->getMessage());
          }
          $i++;
        }

        // Searching or Creating Tags
        $tags = array_map(fn($x) => trim($x), explode(',', $item[14] ?? ''));
        ProductTag::where('producto_id', $productJpa->id)->delete();
        foreach ($tags as $tag) {
          if (Text::nullOrEmpty($tag)) continue;
          $tagJpa = Tag::where('name', $tag)->first();
          if (!$tagJpa) {
            $tagJpa = Tag::create([
              'name' => $tag,
              'slug' => Str::slug($tag)
            ]);
          }

          $tagJpa->update([
            'status' => true,
            'visible' => true
          ]);

          ProductTag::create([
            'producto_id' => $productJpa->id,
            'tag_id' => $tagJpa->id
          ]);
        }

        // if (!Text::nullOrEmpty($item[11])) {
        //   Specifications::updateOrCreate([
        //     'product_id' => $productJpa->id,
        //     'tittle' => 'Color (HEX)'
        //   ], [
        //     'specifications' => $item[11]
        //   ]);
        // }

        dump($productImages);
        dump("{$productJpa->producto}\n{$productJpa->color} - {$productJpa->peso}\n{$discountJpa?->name}");
      } catch (\Throwable $th) {
        dump($th->getMessage());
      }
    }

    dump('Finalizó la carga masiva');
  }
}
