<?php

return [

    'components' => [

        'actions' => [
            'file_upload' => [
                'filepond' => [
                    'labels' => [
                        'file_processing' => 'Téléchargement en cours',
                        'file_processing_complete' => 'Téléchargement terminé',
                        'file_processing_aborted' => 'Téléchargement annulé',
                        'file_processing_error' => 'Erreur lors du téléchargement',
                        'file_processing_revert_error' => 'Erreur lors de l\'annulation',
                        'file_remove_error' => 'Erreur lors de la suppression',
                        'max_file_size_error' => 'Fichier trop volumineux',
                        'max_files_error' => 'Nombre maximum de fichiers atteint',
                        'min_file_size_error' => 'Fichier trop petit',
                        'tap_to_cancel' => 'Appuyez pour annuler',
                        'tap_to_retry' => 'Appuyez pour réessayer',
                        'tap_to_undo' => 'Appuyez pour annuler',
                        'idle' => 'Glissez-déposez vos fichiers ou cliquez pour parcourir',
                    ],
                ],
            ],
        ],

        'builder' => [
            'actions' => [
                'add' => [
                    'label' => 'Ajouter à :label',
                ],
                'add_between' => [
                    'label' => 'Insérer entre les blocs',
                ],
                'clone' => [
                    'label' => 'Cloner',
                ],
                'collapse' => [
                    'label' => 'Réduire',
                ],
                'collapse_all' => [
                    'label' => 'Tout réduire',
                ],
                'delete' => [
                    'label' => 'Supprimer',
                ],
                'expand' => [
                    'label' => 'Agrandir',
                ],
                'expand_all' => [
                    'label' => 'Tout agrandir',
                ],
                'move_down' => [
                    'label' => 'Déplacer vers le bas',
                ],
                'move_up' => [
                    'label' => 'Déplacer vers le haut',
                ],
                'reorder' => [
                    'label' => 'Déplacer',
                ],
            ],
        ],

        'checkbox_list' => [
            'actions' => [
                'deselect_all' => [
                    'label' => 'Tout désélectionner',
                ],
                'select_all' => [
                    'label' => 'Tout sélectionner',
                ],
            ],
        ],

        'file_upload' => [
            'editor' => [
                'actions' => [
                    'cancel' => [
                        'label' => 'Annuler',
                    ],
                    'drag_crop' => [
                        'label' => 'Mode glisser "recadrer"',
                    ],
                    'drag_move' => [
                        'label' => 'Mode glisser "déplacer"',
                    ],
                    'flip_horizontal' => [
                        'label' => 'Retourner horizontalement',
                    ],
                    'flip_vertical' => [
                        'label' => 'Retourner verticalement',
                    ],
                    'move_down' => [
                        'label' => 'Déplacer vers le bas',
                    ],
                    'move_left' => [
                        'label' => 'Déplacer vers la gauche',
                    ],
                    'move_right' => [
                        'label' => 'Déplacer vers la droite',
                    ],
                    'move_up' => [
                        'label' => 'Déplacer vers le haut',
                    ],
                    'reset' => [
                        'label' => 'Réinitialiser',
                    ],
                    'rotate_left' => [
                        'label' => 'Rotation à gauche',
                    ],
                    'rotate_right' => [
                        'label' => 'Rotation à droite',
                    ],
                    'save' => [
                        'label' => 'Enregistrer',
                    ],
                    'zoom_100' => [
                        'label' => 'Zoom à 100%',
                    ],
                    'zoom_in' => [
                        'label' => 'Zoomer',
                    ],
                    'zoom_out' => [
                        'label' => 'Dézoomer',
                    ],
                ],
                'fields' => [
                    'height' => [
                        'label' => 'Hauteur',
                        'unit' => 'px',
                    ],
                    'rotation' => [
                        'label' => 'Rotation',
                        'unit' => 'deg',
                    ],
                    'width' => [
                        'label' => 'Largeur',
                        'unit' => 'px',
                    ],
                    'x_position' => [
                        'label' => 'X',
                        'unit' => 'px',
                    ],
                    'y_position' => [
                        'label' => 'Y',
                        'unit' => 'px',
                    ],
                ],
                'aspect_ratios' => [
                    'label' => 'Ratio',
                    'no_fixed' => [
                        'label' => 'Libre',
                    ],
                ],
            ],
        ],

        'key_value' => [
            'actions' => [
                'add' => [
                    'label' => 'Ajouter une ligne',
                ],
                'delete' => [
                    'label' => 'Supprimer la ligne',
                ],
                'reorder' => [
                    'label' => 'Réorganiser la ligne',
                ],
            ],
            'fields' => [
                'key' => [
                    'label' => 'Clé',
                ],
                'value' => [
                    'label' => 'Valeur',
                ],
            ],
        ],

        'markdown_editor' => [
            'toolbar_buttons' => [
                'attach_files' => 'Joindre des fichiers',
                'blockquote' => 'Citation',
                'bold' => 'Gras',
                'bullet_list' => 'Liste à puces',
                'code_block' => 'Bloc de code',
                'edit' => 'Éditer',
                'heading' => 'Titre',
                'italic' => 'Italique',
                'link' => 'Lien',
                'ordered_list' => 'Liste numérotée',
                'preview' => 'Aperçu',
                'strike' => 'Barré',
                'table' => 'Tableau',
            ],
        ],

        'repeater' => [
            'actions' => [
                'add' => [
                    'label' => 'Ajouter à :label',
                ],
                'add_between' => [
                    'label' => 'Insérer entre',
                ],
                'clone' => [
                    'label' => 'Cloner',
                ],
                'collapse' => [
                    'label' => 'Réduire',
                ],
                'collapse_all' => [
                    'label' => 'Tout réduire',
                ],
                'delete' => [
                    'label' => 'Supprimer',
                ],
                'expand' => [
                    'label' => 'Agrandir',
                ],
                'expand_all' => [
                    'label' => 'Tout agrandir',
                ],
                'move_down' => [
                    'label' => 'Déplacer vers le bas',
                ],
                'move_up' => [
                    'label' => 'Déplacer vers le haut',
                ],
                'reorder' => [
                    'label' => 'Déplacer',
                ],
            ],
        ],

        'rich_editor' => [
            'dialogs' => [
                'link' => [
                    'actions' => [
                        'link' => 'Lier',
                        'unlink' => 'Délier',
                    ],
                    'label' => 'URL',
                    'placeholder' => 'Entrez une URL',
                ],
            ],
            'toolbar_buttons' => [
                'attach_files' => 'Joindre des fichiers',
                'blockquote' => 'Citation',
                'bold' => 'Gras',
                'bullet_list' => 'Liste à puces',
                'code_block' => 'Bloc de code',
                'h1' => 'Titre 1',
                'h2' => 'Titre 2',
                'h3' => 'Titre 3',
                'italic' => 'Italique',
                'link' => 'Lien',
                'ordered_list' => 'Liste numérotée',
                'redo' => 'Rétablir',
                'strike' => 'Barré',
                'underline' => 'Souligné',
                'undo' => 'Annuler',
            ],
        ],

        'select' => [
            'actions' => [
                'create_option' => [
                    'modal' => [
                        'heading' => 'Créer',
                        'actions' => [
                            'create' => [
                                'label' => 'Créer',
                            ],
                            'create_another' => [
                                'label' => 'Créer & en créer un autre',
                            ],
                        ],
                    ],
                ],
                'edit_option' => [
                    'modal' => [
                        'heading' => 'Modifier',
                        'actions' => [
                            'save' => [
                                'label' => 'Enregistrer',
                            ],
                        ],
                    ],
                ],
            ],
            'boolean' => [
                'true' => 'Oui',
                'false' => 'Non',
            ],
            'loading_message' => 'Chargement...',
            'max_items_message' => 'Seulement :count peuvent être sélectionnés.',
            'no_search_results_message' => 'Aucune option ne correspond à votre recherche.',
            'placeholder' => 'Sélectionnez une option',
            'searching_message' => 'Recherche...',
            'search_prompt' => 'Commencez à écrire pour rechercher...',
        ],

        'tags_input' => [
            'placeholder' => 'Nouveau tag',
        ],

        'text_input' => [
            'actions' => [
                'hide_password' => [
                    'label' => 'Masquer le mot de passe',
                ],
                'show_password' => [
                    'label' => 'Afficher le mot de passe',
                ],
            ],
        ],

        'wizard' => [
            'actions' => [
                'next_step' => [
                    'label' => 'Suivant',
                ],
                'previous_step' => [
                    'label' => 'Précédent',
                ],
            ],
        ],

    ],

];
