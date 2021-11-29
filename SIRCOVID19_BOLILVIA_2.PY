import scipy.integrate
import numpy as np
import matplotlib.pyplot as plt
import json

#	beta = 0.10
N = 11350000
beta = 9.906e-8 / 4.20 # infected person infects 1 other person per days		3.00
gamma = 0.34 / 1.37

S0, I0, R0 = 11339469, 9051, 1480  # initial conditions: one infected, rest susceptible

def deriv(y, t, N, beta, gamma):
    S, I, R = y
    dSdt = -beta * S * I
    dIdt = beta * S * I - gamma * I
    dRdt = gamma * I
    return dSdt, dIdt, dRdt

t = np.linspace(0, 300, 300) # Grid of time points (in days)
y0 = S0, I0, R0 # Initial conditions vector

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos10_Bolivia.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados10_Bolivia.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados10_Bolivia.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()


#	beta = 0.11
beta = 9.906e-8 / 4.10 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos11_Bolivia.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados11_Bolivia.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados11_Bolivia.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()



#	beta = 0.12
beta = 9.906e-8 / 4.00 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos12_Bolivia.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados12_Bolivia.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados12_Bolivia.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()



#	beta = 0.13
beta = 9.906e-8 / 3.90 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos13_Bolivia.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados13_Bolivia.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados13_Bolivia.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()



#	beta = 0.14
beta = 9.906e-8 / 3.80 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos14_Bolivia.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados14_Bolivia.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados14_Bolivia.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()



#	beta = 0.15
beta = 9.906e-8 / 3.70 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos15_Bolivia.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados15_Bolivia.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados15_Bolivia.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()



#	beta = 0.16
beta = 9.906e-8 / 3.60 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos16_Bolivia.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados16_Bolivia.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados16_Bolivia.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()



#	beta = 0.17
beta = 9.906e-8 / 3.50 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos17_Bolivia.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados17_Bolivia.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados17_Bolivia.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()