SELECT User.*,Comment.source_id,Profile.*, (SUM(`Comment`.`rating_value`)/ COUNT(Comment.id)) AS rating_avg
, COUNT(Comment.id) AS review_count,
                (SELECT GROUP_CONCAT(Degree.name)
                FROM profiles Profile
                LEFT JOIN profiles_degrees Profile_Degree ON Profile_Degree.profile_id=Profile.user_id

                LEFT JOIN degrees Degree ON Degree.id=Profile_Degree.degree_id
                WHERE Profile.user_id=User.id) AS Degree_name FROM `develop7_drquick`.`users` AS `User
` LEFT JOIN `develop7_drquick`.`roles` AS `Role` ON (`User`.`role_id` = `Role`.`id`) LEFT JOIN `develop7_drquick
`.`profiles` AS `Profile` ON (`Profile`.`user_id` = `User`.`id`) LEFT JOIN `develop7_drquick`.`comments
` AS `Comment` ON (`User`.`id`=`Comment`.`source_id`) LEFT JOIN `develop7_drquick`.`profiles_degrees
` AS `Profile_Degree` ON (`Profile_Degree`.`profile_id` = `Profile`.`user_id`) LEFT JOIN `develop7_drquick
`.`degrees` AS `Degree` ON (`Profile_Degree`.`degree_id` = `Degree`.`id`) LEFT JOIN `develop7_drquick
`.`doctors_hospitals` AS `DocHos` ON (`DocHos`.`doctor_id`=`Profile`.`user_id`)  WHERE `Profile`.`is_approved
`=1  AND `User`.`role_id` = 3 AND `Profile`.`speciality` LIKE 'Alternative Therapist%' AND
 degree_id IN (8,4,5)  GROUP BY `User`.`id`   LIMIT 1