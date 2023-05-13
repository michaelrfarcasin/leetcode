 <?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     *
     */
    function search($nums, $target) {
        return $this->searchWithInfinity($nums, $target);
    }

    /** @source https://leetcode.com/problems/search-in-rotated-sorted-array/solutions/14435/clever-idea-making-it-simple/ */
    private function searchWithInfinity($nums, $target) {
        $low = 0;
        $high = count($nums);
        while ($low < $high) {
            $mid = intdiv($low + $high, 2);
            $currentNumber = $nums[$mid];
            if (!$this->onSameSideOfPivot($nums, $target, $nums[$mid])) {
                $currentNumber = $nums[0] <= $target ? INF : -INF;
            }
            if ($currentNumber == $target) {
                return $mid;
            }
            if ($currentNumber < $target) {
                $low = $mid + 1;
            } else {
                $high = $mid;
            }
        }

        return -1;
    }

    private function onSameSideOfPivot($nums, $target, $current) {
        return ($current < $nums[0]) == ($target < $nums[0]);
    }

    private function oldSearch($nums, $target) {
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

    /** @source https://leetcode.com/problems/search-in-rotated-sorted-array/solutions/14425/concise-o-log-n-binary-search-solution/?envType=study-plan&id=level-2&orderBy=most_votes */
    private function findPivotIndex($nums) {
        $low = 0;
        $high = count($nums) - 1;
        while ($low < $high) {
            $mid = intdiv($low + $high, 2);
            if ($nums[$mid] > $nums[$high]) {
                $low = $mid + 1;
            } else {
                $high = $mid;
            }
        }

        return $low;
    }

    private function binarySearch($nums, $target) {
        $low = 0;
        $high = count($nums);
        while ($low <= $high) {
            $mid = intdiv($low + $high, 2);
            if ($nums[$mid] == $target) {
                return $mid;
            }
            if ($nums[$mid] < $target) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        return -1;
    }
}