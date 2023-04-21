module Tests

open Xunit
open System.Collections.Generic
open AddTwoNumbers

[<Fact>]
let test_addTwoNumbers_zero () =
    let actual = addTwoNumbers [0] [0]
    Assert.Equal<IEnumerable<int>>([0], actual)

[<Fact>]
let test_addTwoNumbers_one () =
    let actual = addTwoNumbers [1] [0]
    Assert.Equal<IEnumerable<int>>([1], actual)
    
[<Fact>]
let test_addTwoNumbers_oneDigit_sumLessThanTen () =
    let actual = addTwoNumbers [1] [1]
    Assert.Equal<IEnumerable<int>>([2], actual)

[<Fact>]
let test_addTwoNumbers_oneDigit_sumOverTen () =
    let actual = addTwoNumbers [5] [5]
    Assert.Equal<IEnumerable<int>>([1;0], actual)

[<Fact>]
let test_addTwoNumbers_twoDigits_allSumsLessThanTen () =
    let actual = addTwoNumbers [0;1] [1;1]
    Assert.Equal<IEnumerable<int>>([1;2], actual)

[<Fact>]
let test_addTwoNumbers_differentLengths () =
    let actual = addTwoNumbers [1;2] [1]
    Assert.Equal<IEnumerable<int>>([1;3], actual)

[<Fact>]
let test_addTwoNumbers_twoDigits_sumsOverTen () =
    let actual = addTwoNumbers [0;5] [1;5]
    Assert.Equal<IEnumerable<int>>([2;0], actual)
    
[<Fact>]
let test_addTwoNumbers_threeDigits_twoSequentialSumsOverTen () =
    let actual = addTwoNumbers [0;9] [9;9]
    Assert.Equal<IEnumerable<int>>([1;0;8], actual)

[<Fact>]
let test_addTwoNumbers_leetCodeExample () =
    let actual = addTwoNumbers [7;2;4;3] [5;6;4]
    Assert.Equal<IEnumerable<int>>([7;8;0;7], actual)