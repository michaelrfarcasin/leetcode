module Tests

open Xunit
open System.Collections.Generic

[<Fact>]
let test_addTwoNumbers_zero () =
    let actual = AddTwoNumbers.addTwoNumbers [0] [0]
    Assert.Equal<IEnumerable<int>>([0], actual)

[<Fact>]
let test_addTwoNumbers_one () =
    let actual = AddTwoNumbers.addTwoNumbers [1] [0]
    Assert.Equal<IEnumerable<int>>([1], actual)
    
[<Fact>]
let test_addTwoNumbers_oneDigit_sumLessThanTen () =
    let actual = AddTwoNumbers.addTwoNumbers [1] [1]
    Assert.Equal<IEnumerable<int>>([2], actual)

[<Fact>]
let test_addTwoNumbers_oneDigit_sumOverTen () =
    let actual = AddTwoNumbers.addTwoNumbers [5] [5]
    Assert.Equal<IEnumerable<int>>([0;1], actual)

[<Fact>]
let test_addTwoNumbers_twoDigits_allSumsLessThanTen () =
    let actual = AddTwoNumbers.addTwoNumbers [1;0] [1;1]
    Assert.Equal<IEnumerable<int>>([2;1], actual)

[<Fact>]
let test_addTwoNumbers_differentLengths () =
    let actual = AddTwoNumbers.addTwoNumbers [1;1] [1]
    Assert.Equal<IEnumerable<int>>([2;1], actual)

[<Fact>]
let test_addTwoNumbers_twoDigits_sumsOverTen () =
    let actual = AddTwoNumbers.addTwoNumbers [5;0] [5;1]
    Assert.Equal<IEnumerable<int>>([0;2], actual)
    
[<Fact>]
let test_addTwoNumbers_threeDigits_twoSequentialSumsOverTen () =
    let actual = AddTwoNumbers.addTwoNumbers [9;0] [9;9]
    Assert.Equal<IEnumerable<int>>([8;0;1], actual)

[<Fact>]
let test_addTwoNumbers_leetCodeExampleOne () =
    let actual = AddTwoNumbers.addTwoNumbers [2;4;3] [5;6;4]
    Assert.Equal<IEnumerable<int>>([7;0;8], actual)

[<Fact>]
let test_addTwoNumbers_leetCodeExampleThree () =
    let actual = AddTwoNumbers.addTwoNumbers [9;9;9;9;9;9;9] [9;9;9;9]
    Assert.Equal<IEnumerable<int>>([8;9;9;9;0;0;0;1], actual)
