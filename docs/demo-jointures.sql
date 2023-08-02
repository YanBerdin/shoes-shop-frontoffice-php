-- Récupérer le nom de la marque et le nom et le prix du produit numero 4
SELECT `brand`.`name`, `product`.`name`, `product`.`price`
FROM `product`
JOIN `brand` ON `brand`.`id` = `product`.`brand_id`
WHERE `product`.`id` = 4;

-- Ou dans l'autre sens (en partant cette fois de brand)

SELECT `brand`.`name`, `product`.`name`, `product`.`price`
FROM `brand`
JOIN `product` ON `product`.`brand_id` = `brand`.`id`
WHERE `product`.`id` = 4;