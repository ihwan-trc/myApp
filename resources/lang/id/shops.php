<?php
/*
language : Indonesia
*/
return [
    'title' => [
        'index' => 'Produk',
        'create' => 'Tambah produk',
        'edit' => 'Ubah produk',
        'detail' => 'Detail produk',
    ],
    'label' => [
        'no_data' => [
            'fetch' => "Data produk belum ada",
            'search' => "Judul produk :keyword tidak ditemukan",
            ]
    ],
    'form_control' => [
        'input' => [
            'title' => [
                'label' => 'Judul',
                'placeholder' => 'Masukan judul',
                'attribute' => 'judul'
            ],
            'slug' => [
                'label' => 'Slug',
                'placeholder' => 'Automatis dibuatkan',
                'attribute' => 'slug'
            ],
            'thumbnail' => [
                'label' => 'Thumbnail',
                'placeholder' => 'Telusuri thumbnail',
                'attribute' => 'thumbnail'
            ],
            'category' => [
                'label' => 'Kategori',
                'placeholder' => 'Pilih kategori',
                'attribute' => 'kategori'
            ],
            'search' => [
                'label' => 'Pencarian',
                'placeholder' => 'Cari produk',
                'attribute' => 'pencarian'
            ]
        ],
        'select' => [
            'tag' => [
                'label' => 'Tag',
                'placeholder' => 'Masukan tag',
                'attribute' => 'tag',
                'option' => [
                    'publish' => 'Terbitkan',
                    'draft' => 'Draft'
                ]
            ],
            'status' => [
                'label' => 'Status',
                'placeholder' => 'Pilih status',
                'attribute' => 'status',
                'option' => [
                    'draft' => 'Draft',
                    'publish' => 'Terbitkan',
                ]
            ],
        ],
        'textarea' => [
            'description' => [
                'label' => 'Deskripsi',
                'placeholder' => 'Masukan deskripsi',
                'attribute' => 'deskripsi'
            ],
            'content' => [
                'label' => 'Konten',
                'placeholder' => 'Masukan konten',
                'attribute' => 'konten'
            ],
        ]
    ],
    'button' => [
        'create' => [
            'value' => 'Tambah'
        ],
        'save' => [
            'value' => 'Simpan'
        ],
        'edit' => [
            'value' => 'Ubah'
        ],
        'delete' => [
            'value' => 'Hapus'
        ],
        'cancel' => [
            'value' => 'Batal'
        ],
        'browse' => [
            'value' => 'Telusuri'
        ],
        'back' => [
            'value' => 'Kembali'
        ],
        'apply' => [
            'value' => 'Terapkan'
        ]
    ],
    'alert' => [
        'create' => [
            'title' => "Tambah produk",
            'message' => [
                'success' => "Produk berhasil disimpan.",
                'error' => "Terjadi kesalahan saat menyimpan produk. :error"
            ]
        ],
        'update' => [
            'title' => 'Ubah produk',
            'message' => [
                'success' => "Produk berhasil diperbaharui.",
                'error' => "Terjadi kesalahan saat perbarui produk. :error"
            ]
        ],
        'delete' => [
            'title' => 'Hapus produk',
            'message' => [
                'confirm' => "Yakin akan menghapus produk :title ?",
                'success' => "Produk berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus produk. :error"
            ]
        ],
    ]
];
