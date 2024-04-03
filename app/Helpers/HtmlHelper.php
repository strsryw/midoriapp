<?php

namespace App\Helpers;

class HtmlHelper
{
    public static function strip_tags_and_style($html)
    {
        // Memeriksa apakah teks tidak mengandung tag HTML
        if (!preg_match('/<[^>]*>/', $html)) {
            return $html; // Mengembalikan teks tanpa melakukan pengolahan tambahan
        }

        // Menghapus tag <h1>, termasuk teks di dalamnya
        $html_stripped = preg_replace('/<h[1-6]>.*?<\/h[1-6]>/i', '', $html);

        // Menghapus tag HTML lainnya dan style dari string
        $html_stripped = strip_tags($html_stripped);
        $html_stripped = preg_replace('/\s+/', ' ', $html_stripped); // Menggabungkan spasi berlebih menjadi satu spasi
        $html_stripped = str_replace('&nbsp;', ' ', $html_stripped); // Mengganti &nbsp; dengan spasi

        // Memotong string jika lebih dari 100 karakter
        $trimmed_text = mb_substr($html_stripped, 0, 100);

        // Memastikan tidak memotong string di tengah kata
        $last_space_pos = mb_strrpos($trimmed_text, ' ');
        $trimmed_text = mb_substr($trimmed_text, 0, $last_space_pos);

        // Jika lebih dari 100 karakter, tambahkan '...'
        if (mb_strlen($html_stripped) > 100) {
            $trimmed_text .= '...';
        } else {
            $trimmed_text = $html_stripped;
        }

        return $trimmed_text;
    }
}
