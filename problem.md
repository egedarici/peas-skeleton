# Simple inheritance

## Problem scope
We are looking for a simple application in PHP about peas with some properties. Each property (gene) is defined by two
hidden variables (alleles), which are combined to form a "visible" value.

Our peas have two properties:
- they are green or yellow; and
- they have a sweetness score from 0-100.

We want to support two functions:
- takes the four hidden variables for a pea and outputs the two "visible" values
- takes the hidden variables for two peas and creates a new pea from the parents, outputting the hidden variables for
  the new pea


### "Visible" values
The "visible" value of a property is controlled by the two hidden variables according to the following rules.

Green/Yellow:
The two hidden variables can either be "Y" or "g". If at least one variable is "Y", then the visible value is "Yellow". If
both variables are "g", then the visible value is "Green".

Sweetness:
The two hidden variables are integers from 0-100. The "visible" value is the average (mean) of the two hidden values.


### Inheritance
When creating a new pea from two "parent" peas, each hidden variable in the new pea is created from exactly one of the
parents (one variable comes from parent A, and the other from parent B). Which hidden variable is used from the parent
is chosen randomly. For example if we have:
```
Parent A        Parent B
c1=Y  c2=g      c1=g  c2=g
```
Then c1 in the new pea is randomly chosen from "Y" and "g" (the hidden variables of parent A), and c2 in the new pea is 
randomly chosen from "g" and "g" (the hidden variables of parent B). 

## Deliverables
- The fleshed-out application in a git repository (by email or give studio@deloryan.com read-access to a remote repository)
- Brief documentation in the readme of what inputs your functions expect

We are specifically looking for clean, well-structured and maintainable code. Please bear in mind that your peas might
have many more properties in the future! 
