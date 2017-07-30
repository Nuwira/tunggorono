<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Anda harus menyetujui :attribute.',
    'active_url'           => 'Pastikan :attribute adalah URL yang benar.',
    'after'                => 'Pastikan :attribute adalah tanggal setelah :date.',
    'after_or_equal'       => 'Pastikan :attribute adalah tanggal setelah atau sama dengan :date.',
    'alpha'                => 'Pastikan :attribute hanya berisi huruf.',
    'alpha_dash'           => 'Pastikan :attribute hanya berisi huruf, angka, dan tanda sambung.',
    'alpha_num'            => 'Pastikan :attribute hanya berisi huruf dan angka.',
    'array'                => 'Pastikan :attribute berupa array.',
    'before'               => 'Pastikan :attribute adalah tanggal sebelum :date.',
    'before_or_equal'      => 'Pastikan :attribute adalah tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => 'Pastikan nilai :attribute antara :min dan :max.',
        'file'    => 'Pastikan ukuran :attribute antara :min dan :max kilobytes.',
        'string'  => 'Pastikan :attribute berjumlah antara :min dan :max karakter.',
        'array'   => 'Pastikan isi array :attribute antara :min dan :max item.',
    ],
    'boolean'              => "Pastikan :attribute harus bernilai 'true' atau 'false'.",
    'confirmed'            => 'Pastikan konfirmasi :attribute sama.',
    'date'                 => 'Pastikan :attribute merupakan tanggal yang benar.',
    'date_format'          => 'Pastikan tanggal :attribute sesuai dengan format :format.',
    'different'            => 'Pastikan :attribute dan :other berbeda.',
    'digits'               => 'Pastikan :attribute harus berjumlah :digits digit.',
    'digits_between'       => 'Pastikan :attribute berjumlah antara :min dan :max digit.',
    'dimensions'           => 'Pastikan :attribute merupakan gambar dan memiliki dimensi.',
    'distinct'             => 'Pastikan :attribute tidak memiliki nilai yang sama.',
    'email'                => 'Pastikan :attribute berupa alamat surel yang benar.',
    'exists'               => 'Pilihan :attribute tidak benar.',
    'file'                 => 'Pastikan :attribute berupa berkas.',
    'filled'               => 'Pastikan :attribute terisi.',
    'image'                => 'Pastikan :attribute berupa berkas gambar.',
    'in'                   => 'Pilihan :attribute tidak benar.',
    'in_array'             => 'Pilihan :attribute tidak ada di :other.',
    'integer'              => 'Pastikan :attribute berupa bilangan.',
    'ip'                   => 'Pastikan :attribute berupa alamat IP.',
    'ipv4'                 => 'Pastikan :attribute berupa alamat IPv4.',
    'ipv6'                 => 'Pastikan :attribute berupa alamat IPv6.',
    'json'                 => 'Pastikan :attribute berupa JSON.',
    'max'                  => [
        'numeric' => 'Pastikan :attribute tidak lebih besar dari :max.',
        'file'    => 'Pastikan ukuran :attribute tidak lebih besar dari :max kilobytes.',
        'string'  => 'Pastikan jumlah :attribute tidak lebih besar dari :max karakter.',
        'array'   => 'Pastikan isi array :attribute tidak lebih besar dari :max item.',
    ],
    'mimes'                => 'Tipe berkas :attribute harus berupa :values.',
    'mimetypes'            => 'Tipe berkas :attribute harus berupa :values.',
    'min'                  => [
        'numeric' => 'Pastikan :attribute paling sedikit :min.',
        'file'    => 'Pastikan ukuran :attribute paling sedikit :min kilobytes.',
        'string'  => 'Pastikan jumlah :attribute paling sedikit :min karakter.',
        'array'   => 'Pastikan isi array :attribute paling sedikit :min item.',
    ],
    'not_in'               => 'Pilihan :attribute tidak benar.',
    'numeric'              => 'Pastikan :attribute berupa angka.',
    'phone'                => 'Pastikan :attribute berupa nomor telepon.',
    'present'              => 'Pastikan :attribute tersedia.',
    'regex'                => 'Format :attribute tidak benar.',
    'required'             => 'Pastikan :attribute terisi.',
    'required_if'          => 'Pastikan :attribute terisi jika :other berisi :value.',
    'required_unless'      => 'Pastikan :attribute terisi kecuali jika :other berisi :values.',
    'required_with'        => 'Pastikan :attribute terisi jika :values ada.',
    'required_with_all'    => 'Pastikan :attribute terisi jika :values ada.',
    'required_without'     => 'Pastikan :attribute terisi jika :values tidak ada.',
    'required_without_all' => 'Pastikan :attribute terisi jika salah satu dari :values tidak ada.',
    'same'                 => 'Pastikan :attribute dan :other sama.',
    'size'                 => [
        'numeric' => 'Pastikan :attribute bernilai :size.',
        'file'    => 'Pastikan :attribute berukuran :size kilobytes.',
        'string'  => 'Pastikan :attribute berjumlah :size karakter.',
        'array'   => 'Pastikan array :attribute berisi :size item.',
    ],
    'string'               => 'Pastikan :attribute berupa string.',
    'timezone'             => 'Pastikan zona waktu :attribute benar.',
    'unique'               => 'Gunakan :attribute yang lainnya.',
    'uploaded'             => 'Berkas :attribute gagal diunggah.',
    'url'                  => 'Pastikan :attribute berupa URL.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
