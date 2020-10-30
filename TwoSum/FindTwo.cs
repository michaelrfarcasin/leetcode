using System.Collections.Generic;

namespace TwoSum
{
    public class FindTwo
    {
        public int[] SumToTargetNaive(int[] numbers, int target)
        {
            for (int secondCandidate = 0; secondCandidate < numbers.Length - 1; secondCandidate++)
            {
                for (int candidate = secondCandidate + 1; candidate < numbers.Length; candidate++)
                {
                    if (numbers[secondCandidate] + numbers[candidate] == target)
                    {
                        return new[] { secondCandidate, candidate };
                    }
                }
            }
            return new[] { 0, 1 };
        }

        public int[] SumToTarget(int[] numbers, int target)
        {
            Dictionary<int, int> seen = new Dictionary<int, int>();
            for (int i = 0; i < numbers.Length; i++)
            {
                if (seen.ContainsKey(target - numbers[i]))
                {
                    return new[] { seen[target - numbers[i]], i };
                }
                if (!seen.ContainsKey(numbers[i]))
                {
                    seen.Add(numbers[i], i);
                }
            }
            return new[] { 0, 1 };
        }
    }
}