<?php

require_once 'vendor/autoload.php';

// Load Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Product;
use Illuminate\Support\Facades\File;

// Get all products with images
$products = Product::whereNotNull('image')->get();

foreach ($products as $product) {
    $oldPath = $product->image;
    
    // Check if the image exists in storage/app/public/products
    $storagePath = storage_path('app/public/products/' . $oldPath);
    $publicPath = public_path('uploads/products/' . $oldPath);
    
    if (File::exists($storagePath) && !File::exists($publicPath)) {
        // Copy the image to public/uploads/products
        File::copy($storagePath, $publicPath);
        echo "Copied: " . $oldPath . "\n";
    } elseif (File::exists($publicPath)) {
        echo "Already exists: " . $oldPath . "\n";
    } else {
        echo "Not found: " . $oldPath . "\n";
    }
}

echo "Done!\n";
