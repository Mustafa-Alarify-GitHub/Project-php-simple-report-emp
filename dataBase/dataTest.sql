INSERT INTO `categorys` (`id`, `name`) VALUES
(1, 'إدارة'),
(2, 'تطوير البرمجيات');

INSERT INTO `criteria` (`id`, `name`) VALUES
(1, 'أداء الموظف'),
(2, 'الالتزام بالعمل');

INSERT INTO `jobs` (`id`, `name`) VALUES
(1, 'مدير مشروع'),
(2, 'مهندس برمجيات');

INSERT INTO `employees` (`id`, `name`, `job_id`, `category_id`, `year_of_employment`, `qualifications`, `experiences`, `courses`, `national_number`) VALUES
(1, 'أحمد محمد', 1, 1, 2015, 'بكالوريوس إدارة أعمال', '10 سنوات خبرة', 'دورات في القيادة والإدارة', '1234567890'),
(2, 'خالد علي', 2, 2, 2018, 'بكالوريوس علوم الحاسوب', '5 سنوات خبرة', 'دورات في تطوير الويب', '0987654321');

INSERT INTO `pointers` (`id`, `name`, `criteria_id`) VALUES
(1, 'دقة العمل', 1),
(2, 'الحضور والانضباط', 2);
