<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "wrapper" => null,
    "class" => "my-navbar rm-default rm-desktop",

    // Here comes the menu items
    "items" => [
        [
            "text" => "Hem",
            "url" => "",
            "title" => "Första sidan, börja här.",
        ],
        [
            "text" => "Redovisning",
            "url" => "redovisning",
            "title" => "Redovisningstexter från kursmomenten.",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Kmom01",
                        "url" => "redovisning/kmom01",
                        "title" => "Redovisning för kmom01.",
                    ],
                    [
                        "text" => "Kmom02",
                        "url" => "redovisning/kmom02",
                        "title" => "Redovisning för kmom02.",
                    ],
                    [
                        "text" => "Kmom03",
                        "url" => "redovisning/kmom03",
                        "title" => "Redovisning för kmom03.",
                    ],
                    [
                        "text" => "Kmom04",
                        "url" => "redovisning/kmom04",
                        "title" => "Redovisning för kmom04.",
                    ],
                    [
                        "text" => "Kmom05",
                        "url" => "redovisning/kmom05",
                        "title" => "Redovisning för kmom05.",
                    ],
                    [
                        "text" => "Kmom06",
                        "url" => "redovisning/kmom06",
                        "title" => "Redovisning för kmom06.",
                    ],

                    [
                        "text" => "Kmom10/Projekt",
                        "url" => "redovisning/kmom10",
                        "title" => "Redovisning för kmom10/projektet.",
                    ],
                ],
            ],
        ],
        [
            "text" => "Rapporter",
            "url" => "rapport",
            "title" => "Rapporter från kursmomenten.",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Färgschema",
                        "url" => "rapport/fargschema",
                        "title" => "Rapport för kmom04.",
                    ],
                    [
                        "text" => "Laddningstid",
                        "url" => "rapport/laddningstid",
                        "title" => "Rapport för kmom05.",
                    ],
                    [
                        "text" => "Designprincip",
                        "url" => "rapport/designprincip",
                        "title" => "Rapport för kmom06/designprincip.",
                    ],
                    [
                        "text" => "Designelement",
                        "url" => "rapport/designelement",
                        "title" => "Rapport för kmom06/designelement.",
                    ],
                    [
                        "text" => "Designprincip implementation",
                        "url" => "rapport/designprinciper",
                        "title" => "Rapport för designprinciper/impl.",
                    ],
                    [
                        "text" => "Designprincip implementation",
                        "url" => "rapport/designprinciper",
                        "title" => "Rapport för designprinciper/impl.",
                    ],
                    [
                        "text" => "Webbplatsdesign (uppdrag 1)",
                        "url" => "rapport/webbplatsdesign",
                        "title" => "Rapport för webbplatsdesign (uppdrag 1)",
                    ],
                    [
                        "text" => "Design och webbplatser (uppdrag 2)",
                        "url" => "rapport/design-och-webbplatser",
                        "title" => "Rapport för design coh webbplatser (uppdrag 2)",
                    ],
                ],
            ],
        ],
        [
            "text" => "Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
        [
            "text" => "Blogg",
            "url" => "blogg",
            "title" => "Bloggen",
        ],
        [
            "text" => "Styleväljare",
            "url" => "style",
            "title" => "Välj stylesheet.",
        ],
        [
            "text" => "Verktyg",
            "url" => "verktyg",
            "title" => "Verktyg och möjligheter för utveckling.",
        ],
        [
            "text" => "Test",
            "url" => "test",
            "title" => "Test (visa text med markdown)",
        ],
    ],
];
