<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'ads' => [
        'name' => 'Ads',
        'index_title' => 'Ads List',
        'new_title' => 'New Ad',
        'create_title' => 'Create Ad',
        'edit_title' => 'Edit Ad',
        'show_title' => 'Show Ad',
        'inputs' => [
            'body' => 'Body',
            'image' => 'Image',
        ],
    ],

    'support_types' => [
        'name' => 'Support Types',
        'index_title' => 'SupportTypes List',
        'new_title' => 'New Support type',
        'create_title' => 'Create SupportType',
        'edit_title' => 'Edit SupportType',
        'show_title' => 'Show SupportType',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'exporters' => [
        'name' => 'Exporters',
        'index_title' => 'Exporters List',
        'new_title' => 'New Exporter',
        'create_title' => 'Create Exporter',
        'edit_title' => 'Edit Exporter',
        'show_title' => 'Show Exporter',
        'inputs' => [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'nationality' => 'Nationality',
            'gender' => 'Gender',
            'license' => 'License',
            'commercial_book' => 'Commercial Book',
            'commercial_room' => 'Commercial Room',
            'block_time' => 'Block Time',
            'block_reason' => 'Block Reason',
            'user_id' => 'User',
        ],
    ],

    'companies' => [
        'name' => 'Companies',
        'index_title' => 'Companies List',
        'new_title' => 'New Company',
        'create_title' => 'Create Company',
        'edit_title' => 'Edit Company',
        'show_title' => 'Show Company',
        'inputs' => [
            'name' => 'Name',
            'city' => 'City',
            'address' => 'Address',
            'phone' => 'Phone',
            'url' => 'Url',
            'export_type' => 'Export Type',
            'exporter_id' => 'Exporter',
        ],
    ],

    'cards' => [
        'name' => 'Cards',
        'index_title' => 'Cards List',
        'new_title' => 'New Card',
        'create_title' => 'Create Card',
        'edit_title' => 'Edit Card',
        'show_title' => 'Show Card',
        'inputs' => [
            'status' => 'Status',
            'issued_at' => 'Issued At',
            'expires_at' => 'Expires At',
            'exporter_id' => 'Exporter',
        ],
    ],

    'supports' => [
        'name' => 'Supports',
        'index_title' => 'Supports List',
        'new_title' => 'New Support',
        'create_title' => 'Create Support',
        'edit_title' => 'Edit Support',
        'show_title' => 'Show Support',
        'inputs' => [
            'description' => 'Description',
            'support_type_id' => 'Support Type',
            'exporter_id' => 'Exporter',
        ],
    ],
];
