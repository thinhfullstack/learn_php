1. Lấy ra tất cả user có giới tính là nữ
2. Lấy ra tất cả các user có giới tính là nam
3. Lấy ra tất cả user có giới tính là nữ và thuộc hộ gia đình có ID là 1
4. Lấy ra tất cả user có giới tính là Nam và thuộc hộ gia đình có ID là 1
5. Lấy ra những user có ngày sinh vào ngày 17-10-2000
6. Lấy ra những gia đình có 2 thành viên trở lên
7. Lấy ra những gia đình ko có thành viên nào
8. Lấy ra những gia đình có con sinh ngày 20-10-2000
9. Lấy ra những gia đình có con là nữ
10. Lấy ra những gia đình có con là Nam
11. Lấy ra những user thuộc từ 2 group trở lên
12. Lấy ra những user không thuộc group nào
13. Lấy ra những group chỉ có thành là nữ
14. Lấy ra những group chỉ có thành là Nam
15. Lấy ra danh sách hộ gia đình và số thành viên tương ứng của hộ gia đình đó


###### Bài làm ######

gender : 1 -> Nam
         2 -> Nữ

1. select name from users where gender = 2;
2. select name from users where gender = 1;
3. select name from users where gender = 2 and family_id = 1;
4. select name from users where gender = 1 and family_id = 1;
5. select name from users where birthday = '2000-10-17';
6. select name, family_id from users group by family_id having count(*) >= 2;
7. select * from families where family_id not in (select distinct family_id from users);

8. 
SQL_1: select name from families where id in (select family_id from users where birthday = '2000-10-20');
SQL_2: select families.name, users.name, birthday from families left join users on families.id = users.family_id where birthday = '2000-10-20';

9. 
SQL_1: select * from families where id in (select family_id from users where gender = 2);
SQL_2: select families.name, users.name, gender from families left join users on families.id = users.family_id where gender = 2;

10. 
SQL_1: select * from families where id in (select family_id from users where gender = 1);
SQL_2: select families.name, users.name, gender from families left join users on families.id = users.family_id where gender = 1;

11. 
SQL_1: select user_id from user_groups group by user_id having count(*) >= 2;
SQL_2: select distinct user_gr_1.user_id from user_groups user_gr_1 inner join (select user_id from user_groups group by user_id having count(*) >= 2) user_gr_2 on user_gr_1.user_id = user_gr_2.user_id;

12. 
SQL_1: select user_id from user_groups group by user_id having count(*) = 0;
SQL_2: select user_gr_1.user_id from user_groups user_gr_1 inner join (select user_id from user_groups group by user_id having count(*) = 0) user_gr_2 on user_gr_1.user_id = user_gr_2.user_id;

13. 
SQL_1: select group_id from user_groups where group_id not in (select id from users where gender = 1);
SQL_2: select distinct user_group.group_id from user_groups user_group left join users user on user_group.group_id = user.id where user.gender != 1 or user.gender is null;

14. 
SQL_1: select group_id from user_groups where group_id not in (select id from users where gender = 2);
SQL_2: select distinct user_group.group_id from user_groups user_group left join users user on user_group.group_id = user.id where user.gender != 2 or user.gender is null;

15. 
SQL_1: select families.name, count(users.id) as total_family from families left join users on families.id = users.family_id group by families.name;
SQL_2: select families.name, (select count(*) from users where users.family_id = families.id) as total_family from families;