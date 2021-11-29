import scipy.integrate
import numpy as np
import matplotlib.pyplot as plt
import json

N = 583330
a = 8.68e-8 * 10.25
b = 0.631e-2
c = 0.34

S0, E0, I0, R0 = 583293, 0, 26, 11  # initial conditions: one infected, rest susceptible

def deriv(y, t, N, a, b, c):
    S, E, I, R = y
    dSdt = -a * S * I
    dEdt = a * S * I - b * E
    dIdt = b * E - c * I
    dRdt = c * I
    return dSdt, dEdt, dIdt, dRdt

t = np.linspace(0, 300, 300) # Grid of time points (in days)
y0 = S0, E0, I0, R0 # Initial conditions vector

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, a, b, c))
S, E, I, R = ret.T


f = open('SEIR_Sospechosos10.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f = open('SEIR_Expuestos10.txt', 'w')
f.write(np.array2string(E, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SEIR_Infectados10.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SEIR_Recuperados10.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()