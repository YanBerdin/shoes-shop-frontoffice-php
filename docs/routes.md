# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/legal-notice` | `GET` | `MainController` | `legalNotice` | Mentions légales | Mentions légales | - |
| `/category/[i:id]` | `GET` | `CatalogController` | `category` | Nom de la catégorie | 1 categorie + les articles de cette catégorie | - |
| `/type/[i:id]` | `GET` | `CatalogController` | `type` | Nom du type | 1 type + les articles de ce type | - |
| `/brand/[i:id]` | `GET` | `CatalogController` | `brand` | Nom de la marque | 1 marque + les articles de cette marque | - |
| `/product/[i:id]` | `GET` | `CatalogController` | `product` | Nom du produit | 1 produit | - |