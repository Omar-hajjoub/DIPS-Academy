<?php

return [

    'modal' => [
        'confirmation' => 'Êtes-vous sûr de vouloir effectuer cette action ?',
        'heading' => 'Confirmation',
        'actions' => [
            'confirm' => [
                'label' => 'Confirmer',
            ],
            'cancel' => [
                'label' => 'Annuler',
            ],
        ],
    ],

    'create' => [
        'single' => [
            'label' => 'Créer',
            'modal' => [
                'heading' => 'Créer :label',
                'actions' => [
                    'create' => [
                        'label' => 'Créer',
                    ],
                    'create_another' => [
                        'label' => 'Créer & en créer un autre',
                    ],
                ],
            ],
            'notifications' => [
                'created' => [
                    'title' => 'Créé',
                ],
            ],
        ],
    ],

    'delete' => [
        'single' => [
            'label' => 'Supprimer',
            'modal' => [
                'heading' => 'Supprimer :label',
                'actions' => [
                    'delete' => [
                        'label' => 'Supprimer',
                    ],
                ],
            ],
            'notifications' => [
                'deleted' => [
                    'title' => 'Supprimé',
                ],
            ],
        ],
        'multiple' => [
            'label' => 'Supprimer la sélection',
            'modal' => [
                'heading' => 'Supprimer les :label sélectionnés',
                'actions' => [
                    'delete' => [
                        'label' => 'Supprimer',
                    ],
                ],
            ],
            'notifications' => [
                'deleted' => [
                    'title' => 'Supprimés',
                ],
            ],
        ],
    ],

    'edit' => [
        'single' => [
            'label' => 'Modifier',
            'modal' => [
                'heading' => 'Modifier :label',
                'actions' => [
                    'save' => [
                        'label' => 'Enregistrer',
                    ],
                ],
            ],
            'notifications' => [
                'saved' => [
                    'title' => 'Enregistré',
                ],
            ],
        ],
    ],

    'view' => [
        'single' => [
            'label' => 'Voir',
            'modal' => [
                'heading' => 'Voir :label',
                'actions' => [
                    'close' => [
                        'label' => 'Fermer',
                    ],
                ],
            ],
        ],
    ],

    'replicate' => [
        'single' => [
            'label' => 'Dupliquer',
            'modal' => [
                'heading' => 'Dupliquer :label',
                'actions' => [
                    'replicate' => [
                        'label' => 'Dupliquer',
                    ],
                ],
            ],
            'notifications' => [
                'replicated' => [
                    'title' => 'Dupliqué',
                ],
            ],
        ],
    ],

    'restore' => [
        'single' => [
            'label' => 'Restaurer',
            'modal' => [
                'heading' => 'Restaurer :label',
                'actions' => [
                    'restore' => [
                        'label' => 'Restaurer',
                    ],
                ],
            ],
            'notifications' => [
                'restored' => [
                    'title' => 'Restauré',
                ],
            ],
        ],
        'multiple' => [
            'label' => 'Restaurer la sélection',
            'modal' => [
                'heading' => 'Restaurer les :label sélectionnés',
                'actions' => [
                    'restore' => [
                        'label' => 'Restaurer',
                    ],
                ],
            ],
            'notifications' => [
                'restored' => [
                    'title' => 'Restaurés',
                ],
            ],
        ],
    ],

    'force_delete' => [
        'single' => [
            'label' => 'Supprimer définitivement',
            'modal' => [
                'heading' => 'Supprimer définitivement :label',
                'actions' => [
                    'force_delete' => [
                        'label' => 'Supprimer définitivement',
                    ],
                ],
            ],
            'notifications' => [
                'deleted' => [
                    'title' => 'Supprimé définitivement',
                ],
            ],
        ],
        'multiple' => [
            'label' => 'Supprimer définitivement la sélection',
            'modal' => [
                'heading' => 'Supprimer définitivement les :label sélectionnés',
                'actions' => [
                    'force_delete' => [
                        'label' => 'Supprimer définitivement',
                    ],
                ],
            ],
            'notifications' => [
                'deleted' => [
                    'title' => 'Supprimés définitivement',
                ],
            ],
        ],
    ],

];
