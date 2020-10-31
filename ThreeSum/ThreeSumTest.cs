using System.Collections.Generic;
using Xunit;

namespace ThreeSum
{
    public class ThreeSumTest
    {
        FindSetsOfThree findSetsOfThree;

        public ThreeSumTest()
        {
            findSetsOfThree = new FindSetsOfThree();
        }

        [Fact]
        public void Test_LessThanThreeNumbers()
        {
            // Arrange
            int[] numbers = { 0, 0 };

            // Act
            IList<IList<int>> actual = findSetsOfThree.SumToZero(numbers);

            // Assert
            int[][] arrayLists = new int[0][];
            Assert.Equal(CreateLists(arrayLists), actual);
        }

        [Fact]
        public void Test_ThreeNumbers_NoTriplets()
        {
            // Arrange
            int[] numbers = { 0, 0, 1 };

            // Act
            IList<IList<int>> actual = findSetsOfThree.SumToZero(numbers);

            // Assert
            int[][] arrayLists = new int[0][];
            Assert.Equal(CreateLists(arrayLists), actual);
        }

        [Fact]
        public void Test_ThreeNumbers_OneTriplet()
        {
            // Arrange
            int[] numbers = { 0, 0, 0 };

            // Act
            IList<IList<int>> actual = findSetsOfThree.SumToZero(numbers);

            // Assert
            Assert.Equal(CreateLists(new[] { new[] { 0, 0, 0 } }), actual);
        }

        [Fact]
        public void Test_FourNumbers_OneTriplet_FirstThree()
        {
            // Arrange
            int[] numbers = { 1, 0, -1, 2 };

            // Act
            IList<IList<int>> actual = findSetsOfThree.SumToZero(numbers);

            // Assert
            Assert.Equal(CreateLists(new[] { new[] { -1, 0, 1 } }), actual);
        }

        [Fact]
        public void Test_FourNumbers_OneTriplet_SecondThree()
        {
            // Arrange
            int[] numbers = { 2, 1, 0, -1 };

            // Act
            IList<IList<int>> actual = findSetsOfThree.SumToZero(numbers);

            // Assert
            Assert.Equal(CreateLists(new[] { new[] { -1, 0, 1 } }), actual);
        }

        [Fact]
        public void Test_FourNumbers_OneTriplet_FirstThreeWithDuplicate()
        {
            // Arrange
            int[] numbers = { 1, 0, -1, 0 };

            // Act
            IList<IList<int>> actual = findSetsOfThree.SumToZero(numbers);

            // Assert
            Assert.Equal(CreateLists(new[] { new[] { -1, 0, 1 } }), actual);
        }

        private IList<IList<int>> CreateLists(int[][] arrayLists)
        {
            IList<IList<int>> lists = new List<IList<int>>();
            foreach (int[] arrayList in arrayLists) {
                List<int> list = new List<int>(arrayList);
                lists.Add(list);
            }

            return lists;
        }
    }
}
