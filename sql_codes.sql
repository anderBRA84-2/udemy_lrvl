SELECT 
b.id as pedido_id,
c.id as product_id,
c.nome
FROM
pedido_produtos as a
LEFT JOIN pedidos as b on (a.pedido_id = b.id)
LEFT JOIN products as c on (a.product_id = c.id);
