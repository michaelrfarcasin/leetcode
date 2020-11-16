module AddTwoNumbers

let addWithPadding (first: int list) (second: int list) =
    let paddingLength = second.Length - first.Length
    let paddedFirst = 
        if paddingLength > 0 
        then first @ (List.init paddingLength (fun x -> 0))
        else first
    let paddedSecond = 
        if paddingLength < 0 
        then second @ (List.init (paddingLength * -1) (fun x -> 0))
        else second
    List.map2 (+) paddedFirst paddedSecond

let rec addTensDigitsToOnesDigits =
    function 
    | [] -> []
    | ints when ints.Head < 10 -> ints.Head :: (addTensDigitsToOnesDigits ints.Tail)
    | head::[] -> [head % 10; head / 10]
    | ints -> 
        let newHead = ints.Head % 10
        let tailHead = match ints.Tail with | [] -> 0 | _ -> ints.Tail.Head
        let secondInt = (ints.Head / 10) + tailHead
        newHead :: (addTensDigitsToOnesDigits (secondInt::ints.Tail.Tail))

let addTwoNumbers (first: int list) (second: int list) =
    let listOfSums = addWithPadding first second
    addTensDigitsToOnesDigits listOfSums