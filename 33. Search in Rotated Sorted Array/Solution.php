 <?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $pivotIndex = $this->findPivotIndex($nums);
        $offset = 0;
        $length = count($nums);
        if ($pivotIndex > -1) {
            if ($nums[0] <= $target) {
                $length = $pivotIndex;
            } else {
                $offset = $pivotIndex;
                $length = count($nums) - $pivotIndex;
            }
        }
        $slice = array_slice($nums, $offset, $length);
        $result = $this->binarySearch($slice, $target);
        if ($result == -1) {
            return $result;
        }
        return $offset + $result;
    }

    private function findPivotIndex($nums) {
        $low = 0;
        $high = count($nums);
        $firstNumber = reset($nums);
        while ($low <= $high) {
            $mid = floor(($low + $high) / 2);
            if ($nums[$mid] > $nums[$mid + 1] && isset($nums[$mid + 1])) {
                return $mid + 1;
            }
            if ($firstNumber <= $nums[$mid]) {
                $low = $mid + 1;
                continue;
            }
            $high = $mid - 1;
        }

        return -1;
    }

    private function binarySearch($nums, $target) {
        $low = 0;
        $high = count($nums);
        while ($low <= $high) {
            $mid = floor(($low + $high) / 2);
            if ($nums[$mid] == $target) {
                return $mid;
            }
            if ($nums[$mid] < $target) {
                $low = $mid + 1;
                continue;
            }
            $high = $mid - 1;
        }

        return -1;
    }
}