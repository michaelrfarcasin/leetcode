using System;
using System.Linq;
using System.Collections.Generic;

namespace ThreeSum
{
    public class FindSetsOfThree
    {
        public IList<IList<int>> SumToZeroNaive(int[] numbers)
        {
            HashSet<IList<int>> triplets = new HashSet<IList<int>>(new SequenceComparer<int>());
            if (numbers.Length < 3)
            {
                return triplets.ToList();
            }

            List<int> triplet;
            for (int i = 0; i < numbers.Length - 2; i++)
            {
                for (int j = i + 1; j < numbers.Length - 1; j++)
                {
                    for (int k = j + 1; k < numbers.Length; k++)
                    {
                        triplet = new List<int> { numbers[i], numbers[j], numbers[k] };
                        if (triplet.Sum() == 0)
                        {
                            triplet.Sort();
                            triplets.Add(triplet);
                        }
                    }
                }
            }

            return triplets.ToList();
        }

        public IList<IList<int>> SumToZero(int[] numbers)
        {
            List<IList<int>> triplets = new List<IList<int>>();
            if (numbers.Length < 3)
            {
                return triplets.ToList();
            }

            Array.Sort(numbers);
            List<int> triplet;
            for (int i = 0; i < numbers.Length - 2; i++)
            {
                if (i != 0 && numbers[i] == numbers[i - 1])
                {
                    continue;
                }
                int j = i + 1;
                int k = numbers.Length - 1;
                int sum = 0;
                while (j < k)
                {
                    sum = numbers[i] + numbers[j] + numbers[k];
                    if (sum == 0)
                    {
                        triplet = new List<int> { numbers[i], numbers[j], numbers[k] };
                        triplets.Add(triplet);
                        j++;
                        while (j < k && numbers[j] == numbers[j-1])
                        {
                            j++;
                        }
                    }
                    else if (sum < 0)
                    {
                        j++;
                    } else
                    {
                        k--;
                    }
                }
            }

            return triplets.ToList();
        }
    }
}