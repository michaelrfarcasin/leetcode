 <?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     * @source https://leetcode.com/problems/search-a-2d-matrix/solutions/26220/don-t-treat-it-as-a-2d-matrix-just-treat-it-as-a-sorted-list
     */
    function searchMatrix($matrix, $target) {
        $numberRows = count($matrix);
        $numberColumns = count($matrix[0]);
        $left = 0;
        $right = $numberRows * $numberColumns - 1;
        while ($left != $right) {
            $mid = ($left + $right - 1) >> 1;
            if ($matrix[$mid / $numberColumns][$mid % $numberColumns] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }

        return $matrix[$right / $numberColumns][$right % $numberColumns] == $target;
    }
}