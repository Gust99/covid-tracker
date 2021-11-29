import scipy.integrate
import numpy as np
import matplotlib.pyplot as plt
import json

#	beta = 9.906e-8 * 6.55
N = 583330
beta = 9.906e-8 * 6.55 # infected person infects 1 other person per days
gamma = 0.34

S0, I0, R0 = 583293, 26, 11  # initial conditions: one infected, rest susceptible

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


f = open('SIR_Sospechosos10.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados10.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados10.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()


#	beta = 9.906e-8 * 6.80
beta = 9.906e-8 * 6.80 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos11.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados11.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados11.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()



#	beta =9.906e-8 * 7.05
beta = 9.906e-8 * 7.05 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos12.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados12.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados12.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()



#	beta = 9.906e-8 * 7.30
beta = 9.906e-8 * 7.30 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos13.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados13.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados13.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()



#	beta = 9.906e-8 * 7.55
beta = 9.906e-8 * 7.55 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos14.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados14.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados14.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()



#	beta = 9.906e-8 * 7.80
beta = 9.906e-8 * 7.80 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos15.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados15.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados15.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()



#	beta = 9.906e-8 * 8.05
beta = 9.906e-8 * 8.05 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos16.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados16.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados16.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()



#	beta = 9.906e-8 * 8.30
beta = 9.906e-8 * 8.30 # infected person infects 1 other person per days

# Integrate the SIR equations over the time grid, t.
ret = scipy.integrate.odeint(deriv, y0, t, args=(N, beta, gamma))
S, I, R = ret.T


f = open('SIR_Sospechosos17.txt', 'w')
f.write(np.array2string(S, precision=20, separator=',', suppress_small=False))
f.close()

f1 = open('SIR_Infectados17.txt', 'w')
f1.write(np.array2string(I, precision=20, separator=',', suppress_small=False))
f1.close()

f2 = open('SIR_Recuperados17.txt', 'w')
f2.write(np.array2string(R, precision=20, separator=',', suppress_small=False))
f2.close()