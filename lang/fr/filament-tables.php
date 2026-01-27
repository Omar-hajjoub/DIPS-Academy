<?php

return [

    'column_toggle' => [
        'heading' => 'Colonnes',
    ],

    'columns' => [
        'text' => [
            'actions' => [
                'collapse_list' => 'Afficher :count de moins',
                'expand_list' => 'Afficher :count de plus',
            ],
            'more_list_items' => 'et :count de plus',
        ],
    ],

    'fields' => [
        'bulk_select_page' => [
            'label' => 'Sélectionner/Désélectionner tous les éléments pour les actions groupées.',
        ],
        'bulk_select_record' => [
            'label' => 'Sélectionner/Désélectionner l\'élément :key pour les actions groupées.',
        ],
        'bulk_select_group' => [
            'label' => 'Sélectionner/Désélectionner le groupe :title pour les actions groupées.',
        ],
        'search' => [
            'label' => 'Rechercher',
            'placeholder' => 'Rechercher',
            'indicator' => 'Recherche',
        ],
    ],

    'summary' => [
        'heading' => 'Résumé',
        'subheadings' => [
            'all' => 'Tous les :label',
            'group' => 'Résumé de :group',
            'page' => 'Cette page',
        ],
        'summarizers' => [
            'average' => [
                'label' => 'Moyenne',
            ],
            'count' => [
                'label' => 'Total',
            ],
            'sum' => [
                'label' => 'Somme',
            ],
        ],
    ],

    'actions' => [
        'disable_reordering' => [
            'label' => 'Terminer le réordonnancement',
        ],
        'enable_reordering' => [
            'label' => 'Réorganiser',
        ],
        'filter' => [
            'label' => 'Filtrer',
        ],
        'group' => [
            'label' => 'Grouper',
        ],
        'open_bulk_actions' => [
            'label' => 'Actions groupées',
        ],
        'toggle_columns' => [
            'label' => 'Afficher/Masquer les colonnes',
        ],
    ],

    'empty' => [
        'heading' => 'Aucun :model trouvé',
        'description' => 'Créer un :model pour commencer.',
    ],

    'filters' => [
        'actions' => [
            'apply' => [
                'label' => 'Appliquer les filtres',
            ],
            'remove' => [
                'label' => 'Supprimer le filtre',
            ],
            'remove_all' => [
                'label' => 'Supprimer tous les filtres',
                'tooltip' => 'Supprimer tous les filtres',
            ],
            'reset' => [
                'label' => 'Réinitialiser',
            ],
        ],
        'heading' => 'Filtres',
        'indicator' => 'Filtres actifs',
        'multi_select' => [
            'placeholder' => 'Tous',
        ],
        'select' => [
            'placeholder' => 'Tous',
        ],
        'trashed' => [
            'label' => 'Enregistrements supprimés',
            'only_trashed' => 'Uniquement supprimés',
            'with_trashed' => 'Avec les supprimés',
            'without_trashed' => 'Sans les supprimés',
        ],
    ],

    'grouping' => [
        'fields' => [
            'group' => [
                'label' => 'Grouper par',
                'placeholder' => 'Grouper par',
            ],
            'direction' => [
                'label' => 'Direction du groupe',
                'options' => [
                    'asc' => 'Croissant',
                    'desc' => 'Décroissant',
                ],
            ],
        ],
    ],

    'reorder_indicator' => 'Glissez-déposez les enregistrements dans l\'ordre.',

    'selection_indicator' => [
        'selected_count' => '1 enregistrement sélectionné|:count enregistrements sélectionnés',
        'actions' => [
            'select_all' => [
                'label' => 'Sélectionner les :count enregistrements',
            ],
            'deselect_all' => [
                'label' => 'Tout désélectionner',
            ],
        ],
    ],

    'sorting' => [
        'fields' => [
            'column' => [
                'label' => 'Trier par',
            ],
            'direction' => [
                'label' => 'Direction du tri',
                'options' => [
                    'asc' => 'Croissant',
                    'desc' => 'Décroissant',
                ],
            ],
        ],
    ],

];
