function gcd(number) {
  console.log(number);
}


function sum(x, y) {
  return x + y;
}

function parameters() {
  var sum = 0.0;
  for (var i=0; i<arguments.length; i++) {
    sum += arguments[i];
  }
  return sum;
}

function fizzBuzz() {
  var lowerBound = 1;
  var upperBound = 100;

  for (i = lowerBound; i <= upperBound; i++) {
    if (i % 15 == 0) {
      console.log("FizzBuzz");
    } else if (i % 5 == 0) {
      console.log("Buzz");
    } else if (i % 3 == 0) {
      console.log("Fizz");
    } else {
      console.log(i);
    }
  }
}

function gcd(a,b) {
    a = Math.abs(a);
    b = Math.abs(b);
    if (b > a) {var temp = a; a = b; b = temp;}
    while (true) {
        if (b == 0) return a;
        a %= b;
        if (a == 0) return b;
        b %= a;
    }
}
