<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Storage;

class SeedImageHelper
{
    public static function copy(string $sourceFolder, string $filenameWithoutExt, string $destFolder): ?string
    {
        $base = database_path("seeders/images/{$sourceFolder}");
        $extensions = ['png', 'jpg', 'jpeg', 'webp'];

        foreach ($extensions as $ext) {
            $sourcePath = "{$base}/{$filenameWithoutExt}.{$ext}";

            if (file_exists($sourcePath)) {
                $destPath = "{$destFolder}/{$filenameWithoutExt}.{$ext}";
                Storage::disk('public')->put($destPath, file_get_contents($sourcePath));

                return $destPath;
            }
        }

        return null;
    }
}
