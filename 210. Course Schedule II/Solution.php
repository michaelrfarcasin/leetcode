<?php

class Solution {

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Integer[]
     */
    function findOrder($numCourses, $prerequisites) {
        if (count($prerequisites) == 0) {
            return range(0, $numCourses - 1);
        }
        $numberPrerequisites = array_fill(0, $numCourses, 0);
        $prerequisiteMap = array_fill(0, $numCourses, []);
        foreach ($prerequisites as $pair) {
            $course = $pair[0];
            $prerequisite = $pair[1];
            $prerequisiteMap[$prerequisite][] = $course;
            $numberPrerequisites[$course]++;
        }
        $queue = new SplQueue();
        for ($course = 0; $course < $numCourses; $course++) {
            if ($numberPrerequisites[$course] == 0) {
                $queue->enqueue($course);
            }
        }
        $count = 0;
        $ordering = [];
        while (!$queue->isEmpty()) {
            $course = $queue->dequeue();
            $count++;
            $ordering[] = $course;
            foreach ($prerequisiteMap[$course] as $nextCourse) {
                $numberPrerequisites[$nextCourse]--;
                if ($numberPrerequisites[$nextCourse] == 0) {
                    $queue->enqueue($nextCourse);
                }
            }
        }

        return $count == $numCourses ? $ordering : [];
    }
}