<?php

namespace Source\Helpers;

class SimpleCaptcha
{
    private $key;
    private $width;
    private $height;
    private $image;

    public function __construct(string $key = null, bool $random_color = false)
    {
        if (is_null($key)) {
            $this->key = rand(10000, 99999);
        } else {
            $this->key = $key;
        }

        $this->width = 48;
        $this->height = 20;

        if (strlen($this->key) > 5) {
            $this->key = substr($this->key, 0, 16);
            $count_max = strlen($this->key) - 5;
            for ($i = 0; $i < $count_max; $i++) {
                $this->width += 9;
            }
        }

        $this->image = @imagecreate($this->width, $this->height) or die("Erro! Cannot Initialize new GD image stream");

        if ($random_color) {
            $this->getRandomColor(0, 127);
            $text_color = $this->getRandomColor(128, 255);
        } else {
            imagecolorallocate($this->image, 200, 200, 200);
            $text_color = imagecolorallocate($this->image, 255, 0, 0);
        }

        imagestring($this->image, 8, 2, 2, $this->key, $text_color);
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getImg(string $w = null, string $h = null): string
    {
        ob_start();
        imagepng($this->image);
        $rawImageBytes = ob_get_clean();
        return "data:image/jpeg;base64," . base64_encode($rawImageBytes);
    }

    private function getRandomColor(int $range_min = 0, int $range_max = 255)
    {
        return imagecolorallocate($this->image, rand($range_min, $range_max), rand($range_min, $range_max), rand($range_min, $range_max));
    }
}
