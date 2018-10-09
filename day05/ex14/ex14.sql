SELECT floor_number AS 'floor', sum(nb_seats) as 'seats'
  FROM cinema
  GROUP BY floor_number
  ORDER BY seats DESC