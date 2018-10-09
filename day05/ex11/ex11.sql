SELECT UPPER(user_card.last_name) AS "NAME", `first_name`, `price`
FROM user_card,subscription,member
WHERE user_card.id_user = member.id_user_card && subscription.price > 42 && subscription.id_sub= member.id_sub
ORDER BY user_card.last_name, user_card.first_name;