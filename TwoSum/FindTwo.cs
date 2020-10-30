namespace TwoSum
{
    public class FindTwo
    {
        public int[] SumToTarget(int[] numbers, int target)
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
    }
}