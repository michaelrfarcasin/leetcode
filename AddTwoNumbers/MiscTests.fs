module MiscTests

open Xunit
open System.Collections.Generic

[<Fact>]
let test_listInit () =
    Assert.Equal<IEnumerable<int>>([0;0], List.init 2 (fun x -> 0))

[<Fact>]
let test_sublist () =
    let mylist = [0;1];
    Assert.Equal<IEnumerable<int>>([0], mylist.[.. (mylist.Length - 2)])

[<Fact>]
let test_listLast () =
    Assert.Equal<int>(0, List.last [0;0])

[<Fact>]
let test_listTailHead () =
    Assert.Equal<int>(2, [1;2;3].Tail.Head)