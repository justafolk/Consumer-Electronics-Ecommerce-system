nums = [-13,2,3,4,5]
def sqsum2():
  	return sum(x^2 for x in nums if x > 0)
def sqsum4():
  	return sum(x**2 for x in nums if x > 0)
print(sqsum4())
print(sqsum2())
