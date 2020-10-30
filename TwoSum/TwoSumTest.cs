using Xunit;

namespace TwoSum
{
    public class TwoSumTest
    {
        FindTwo findTwo;

        public TwoSumTest()
        {
            findTwo = new FindTwo();
        }

        [Fact]
        public void Test_TwoNumbers()
        {
            int target = 0;
            int[] numbers = { 0, 0 };
            Assert.Equal(new[] { 0, 1 }, findTwo.SumToTarget(numbers, target));
        }

        [Fact]
        public void Test_ThreeNumbers_FirstAndLast()
        {
            int target = 4;
            int[] numbers = { 1, 2, 3 };
            Assert.Equal(new[] { 0, 2 }, findTwo.SumToTarget(numbers, target));
        }

        [Fact]
        public void Test_ThreeNumbers_FirstAndSecond()
        {
            int target = 3;
            int[] numbers = { 1, 2, 3 };
            Assert.Equal(new[] { 0, 1 }, findTwo.SumToTarget(numbers, target));
        }

        [Fact]
        public void Test_ThreeNumbers_SecondAndLast()
        {
            int target = 5;
            int[] numbers = { 1, 2, 3 };
            Assert.Equal(new[] { 1, 2 }, findTwo.SumToTargetON(numbers, target));
        }
    }
}
