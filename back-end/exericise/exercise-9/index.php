<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập phần 9</title>
</head>

<body>
    <?php
        $list_categories = array(
            1 => array(
                'id' => 1,
                'name' => 'Giáo dục',
                'level' => 1,
                'parent_id' => 0,
            ),
            2 => array(
                'id' => 2,
                'name' => 'Khuyến học',
                'level' => 2,
                'parent_id' => 1,
            ),
            3 => array(
                'id' => 3,
                'name' => 'Du học',
                'level' => 2,
                'parent_id' => 1,
            ),
            4 => array(
                'id' => 4,
                'name' => 'Thể thao',
                'level' => 1,
                'parent_id' => 0,
            ),
            5 => array(
                'id' => 5,
                'name' => 'Châu Âu',
                'level' => 2,
                'parent_id' => 4,
            ),
            6 => array(
                'id' => 6,
                'name' => 'Châu Á',
                'level' => 2,
                'parent_id' => 4,
            ),
            7 => array(
                'id' => 7,
                'name' => 'Việt Nam',
                'level' => 3,
                'parent_id' => 6,
            ),
            8 => array(
                'id' => 8,
                'name' => 'Ngoại Hạng Anh',
                'level' => 3,
                'parent_id' => 5,
            ),
            9 => array(
                'id' => 9,
                'name' => 'Thái Lan',
                'level' => 3,
                'parent_id' => 6,
            ),
            10 => array(
                'id' => 10,
                'name' => 'King Cup',
                'level' => 4,
                'parent_id' => 9,
            ),
            11 => array(
                'id' => 11,
                'name' => 'Giải Hạng Nhất',
                'level' => 4,
                'parent_id' => 7,
            ),
        );

        $list_parent_id = array_map(function ($arr) {
          return $arr['parent_id'];
        }, $list_categories);
        $list_parent_id = array_unique($list_parent_id);
        
        foreach ($list_parent_id as $parent_id) {
            get_list_by_parent_id($parent_id);
        }
        

        function get_list_by_parent_id($parent_id) {
            global $list_categories;
            foreach ($list_categories as $key => $arr) {
                if ($arr['parent_id'] == $parent_id) {
                    $id = $arr['id'];
                    echo str_repeat(" _ ", ($arr['level'] - 1) * 2). $arr['name'] . "<br />";
                    show_level_by_parent_id($id);
                    // delete item
                    unset($list_categories[$key]);
                } 
            }
        }

        function show_level_by_parent_id($id) {
          global $list_categories;
          foreach ($list_categories as $key => $arr) {
              if ($arr['parent_id'] == $id) {
                  echo str_repeat(" _ ", ($arr['level'] - 1) * 2). $arr['name'] . "<br />";
                  get_list_by_parent_id($arr['id']);
                  // delete item 
                  unset($list_categories[$key]);
              }
          }
        }
    ?>
</body>

</html>