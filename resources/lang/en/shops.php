<?php
/*
language : English
*/
return [
    'title' => [
        'index' => 'Shops',
        'create' => 'Add product',
        'edit' => 'Edit product',
        'detail' => 'Detail product',
    ],
    'label' => [
        'no_data' => [
            'fetch' => "No product data yet",
            'search' => ":keyword product not found",
        ]
    ],
    'form_control' => [
        'input' => [
            'title' => [
                'label' => 'Title',
                'placeholder' => 'Enter title',
                'attribute' => 'title'
            ],
            'slug' => [
                'label' => 'Slug',
                'placeholder' => 'Auto generate',
                'attribute' => 'slug'
            ],
            'thumbnail' => [
                'label' => 'Thumbnail',
                'placeholder' => 'Browse thumbnails',
                'attribute' => 'thumbnail'
            ],
            'category' => [
                'label' => 'Category',
                'placeholder' => 'Choose category',
                'attribute' => 'category'
            ],
            'search' => [
                'label' => 'Search',
                'placeholder' => 'Search for Product',
                'attribute' => 'search'
            ]
        ],
        'select' => [
            'tag' => [
                'label' => 'Tag',
                'placeholder' => 'Enter tag',
                'attribute' => 'tag',
                'option' => [
                    'publish' => 'Publish',
                    'draft' => 'Draft'
                ],
            ],
            'status' => [
                'label' => 'Status',
                'placeholder' => 'Choose status',
                'attribute' => 'status',
                'option' => [
                    'draft' => 'Draft',
                    'publish' => 'Publish',
                ]
            ],
        ],
        'textarea' => [
            'description' => [
                'label' => 'Description',
                'placeholder' => 'Enter description',
                'attribute' => 'description'
            ],
            'content' => [
                'label' => 'Content',
                'placeholder' => 'Enter content',
                'attribute' => 'content'
            ],
        ]
    ],
    'button' => [
        'create' => [
            'value' => 'Add'
        ],
        'save' => [
            'value' => 'Save'
        ],
        'edit' => [
            'value' => 'Edit'
        ],
        'delete' => [
            'value' => 'Delete'
        ],
        'cancel' => [
            'value' => 'Cancel'
        ],
        'browse' => [
            'value' => 'Browse'
        ],
        'back' => [
            'value' => 'Back'
        ],
        'apply' => [
            'value' => 'Apply'
        ]
    ],
    'alert' => [
        'create' => [
            'title' => 'Add product',
            'message' => [
                'success' => "Product saved successfully.",
                'error' => "An error occurred while saving the product. :error"
            ]
        ],
        'update' => [
            'title' => 'Edit product',
            'message' => [
                'success' => "Product updated successfully.",
                'error' => "An error occurred while updating the product. :error"
            ]
        ],
        'delete' => [
            'title' => 'Delete product',
            'message' => [
                'confirm' => "Are you sure you want to delete the :title product?",
                'success' => "Product deleted successfully.",
                'error' => "An error occurred while deleting the product. :error"
            ]
        ],
    ]
];
