DROP DATABASE IF EXISTS academia;
CREATE DATABASE academia;
USE academia;

DROP TABLE IF EXISTS Aluno;
CREATE TABLE Aluno (
    matricula INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR (100),
    telefone CHAR (9),
    email VARCHAR (50),
    cpf CHAR (11),
    nascimento DATE 
);

DROP TABLE IF EXISTS Agenda;
CREATE TABLE Agenda (
    ID_Agenda INT PRIMARY KEY AUTO_INCREMENT,
    Data DATE,
    Hora TIME,
    matricula INT,
    FOREIGN KEY (matricula) REFERENCES Aluno(matricula)
);

DROP TABLE IF EXISTS Professor;
CREATE TABLE Professor (
    ID_Professor INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR (100), 
    cref INT,
    telefone CHAR (111)
);

DROP TABLE IF EXISTS Treino;
CREATE TABLE Treino (
    ID_Treino INT PRIMARY KEY AUTO_INCREMENT,
    ID_Professor INT,
    matricula INT,
    FOREIGN KEY (ID_Professor) REFERENCES Professor(ID_Professor),
    FOREIGN KEY (matricula) REFERENCES Aluno (matricula)
);

DROP TABLE IF EXISTS Avaliacao_Fisica;
CREATE TABLE Avaliacao_Fisica (
    ID_Avaliacao INT PRIMARY KEY AUTO_INCREMENT,
    altura BOOLEAN,
    peso BOOLEAN,
    gordura BOOLEAN,
    massaMuscular BOOLEAN,
    ID_Professor INT,
    matricula INT,
    FOREIGN KEY (ID_Professor) REFERENCES Professor(ID_Professor),
    FOREIGN KEY (matricula) REFERENCES Aluno (matricula)
);

DROP TABLE IF EXISTS Exercicio;
CREATE TABLE Exercicio (
    ID_Exercicio INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR (100),
    series INT,
    repeticoes INT,
    intervalo INT,
    ID_Treino INT,
    FOREIGN KEY (ID_Treino) REFERENCES Treino (ID_Treino)
);