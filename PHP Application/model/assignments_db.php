<?php
    function get_assignments_by_course($course_id){
        global $db;
        if($course_id){
            $query = 'SELECT A.ID, A.Description, C.courseName, FROM assignment A LEFT JOIN
            course C ON A.csourse.ID = C.courseID WHERE A.course.ID = :course_id ORDER BY A.ID';
        }else {
            $query = 'SELECT A.ID, A.Description, C.courseName, FROM assignment A LEFT JOIN
            course C ON A.csourse.ID = C.courseID ORDER BY C.courseID';
        }
       $statement = $db->prepare($query);
       $statement->bindValue(':course_id', $course_id);
       $statement->execute();
       $assignments = $statement->fetchAll();
       $statement->closeCursor();
       return $assignments;
    }

    function delete_assignment($assignment_id){
        global $db;
        $query = 'DELETE FROM assignments WHERE ID = :assign_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':assign_id', $assignment_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_assignment($course_id, $description){
        global $db;
        $query = 'INSERT INTO assignments (Description, courseID) VALUES(:descre, :courseID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':descre', $description);
        $statement->bindValue(':courseID', $$course_id);
        $statement->execute();
        $statement->closeCursor();
    }
?>