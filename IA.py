
# DataSet - Supervisionado do tipo classificação
# target(Alvo)  - Pesquisa sobre câncer de pulmão - Homens e mulheres que tem ou não câncer.


import pandas as pd #importação da biblioteca pandas, para manipulação dos dados
import matplotlib.pyplot as plt #biblioteca para visualizar dados, gráficos para facilitar a análise.
from sklearn.preprocessing import LabelEncoder #arquivo específico da bibioteca 
#para coverter dados não numéricos em valores numéricos

#intalação pelo terminal - pip install pandas
#intalação pelo terminal - pip install matplotlib.pyplot para instalar especificamente uma parte da biblioteca
#intalação pelo terminal - pip install sklearn.preprocessing

arquivo = "C:\\Users\\55618\\OneDrive\\Documentos\\GRADUAÇÃO CIÊNCIA DE DADOS\\1 semestre\\inteligência artificial\\2 bim\\Projeto final\\survey lung cancer.csv"

def carregarDados(file):#função para carregar o arquivo CSV
    dados = pd.read_csv(file)  # Carregar dados do arquivo
    return dados

dados = carregarDados(arquivo)  # Executa a função de carregar os dados

#função para tratar os dados
#objetivo - informar, descrever e exibir informações relavantes ou nao para o aprendizado de máquina
def tratarDados(dados):
    print(dados.info())  # Informações básicas do arquivo
    print(dados.describe())  # Informações básicas de estatística
    print(dados.head())  # Carrega as 5 primeiras linhas
    print(dados.tail())  # Carrega as 5 últimas linhas
    
    
    dados.drop_duplicates(inplace=True)  # Deletar dados duplicados
    print(dados.info())

    
    dados.drop(columns=["ALLERGY"], inplace=True)  #Deletar colunas, inplace TRUE lê o dado aplica em memória 
    #a alteração
    print(dados.info())

    
    dados.dropna(inplace=True)  # Deletar dados nulos
    print(dados.info())
        
    # transformação de não numéricos em numéricos
    # Transformando coluna string em númérico usando o método fit.transform
    LE = LabelEncoder()  # Instanciar o LabelEncoder
    dados['GENDER'] = LE.fit_transform(dados['GENDER']) #fit_transform é um método p/ transformar string em int
    dados['LUNG_CANCER'] = LE.fit_transform(dados['LUNG_CANCER'])  

    #print(dados.head())
    return dados

dados = tratarDados(dados)  # Executa a função de tratamento dos dados

#Objetivo do procedimento:
#1 - Criar um gráfico para comparar a incidência de câncer de pulmão por gêneros(Homens e mulheres)
def cancer_pulmao(dados):
    # Agrupa os dados das colunas GENDER(gênero) e LUNG_CANCER(tem ou não câncer) e conta as ocorrências
    dadosGrupo = dados.groupby(['GENDER','LUNG_CANCER']).size().unstack() #agruapando por diversas colunas
    #size é um método que conta quantas pessoas tem em cada grupo e o método unstack transforma em tabela, cada
    #grupo é separada por colunas representando os que tem ou não cancêr.

    # Nomes para as barras (Homens e Mulheres)
    labels = ['Mulheres','Homens']
    # Quantidade de pessoas com e sem câncer
    com_cancer = dadosGrupo[1]  #variavel com cancêr está buscando nos dados a quantidade de pessoas com câncer
    sem_cancer = dadosGrupo[0]  #variavel sem cancêr está buscando nos dados a quantidade de pessoas sem câncer

    # Definindo a posição das barras no gráfico
    x = range(len(labels)) # calcula a quantidade de elementos na lista e armazena na variável x
    print(dadosGrupo)

    # Criando o gráfico de barras
    fig, ax = plt.subplots() #cria uma figura com um ou mais eixos, no caso do gráfico x e y
    ax.bar(x, com_cancer, width=0.4, label='Com Câncer', color='tab:red', align='center') #adiciona descrição das barras
    ax.bar(x, sem_cancer, width=0.4, label='Sem Câncer', color='tab:blue', align='edge')

    # Adicionando rótulos e título
    ax.set_xlabel('Gênero')  #adiciona rótulo ao eixo y
    ax.set_ylabel('Número de Pessoas') #adiciona rótulo ao eixo x
    ax.set_title('Quantidade de Homens e Mulheres com Câncer de Pulmão') #adiciona título ao gráfico
    ax.set_xticks(x)
    ax.set_xticklabels(labels) # Rotaciona os rótulos do eixo x para melhor visualização
    
    # Legenda
    ax.legend() #adicona legenda

    # Exibindo o gráfico
    plt.show()

# Chamada da função:
cancer_pulmao(dados)

#Objetivo do procedimento:
#1 - Agrupar os dados de fumantes e não fumantes
#2 - Exibir através do agrupamento de dados a presença ou ausância de câncer em fumantes e não fumantes
#3 - criar um gráfico de barras que visualize essa relação
def fumante(dados):
    # Agrupar por fumante e câncer
    fumo_cancer = dados.groupby(['SMOKING', 'LUNG_CANCER']).size().unstack()
    #conta quantas indicações de câncer e fumantes
    #tranforma os valores da coluna lung_cancer em colunas separadas, criando uma tabela de fumantes como indíce
    #e categorias de câncer (sim ou não) como colunas.
    print(fumo_cancer)
# Plotar o gráfico de barras agrupadas
    fumo_cancer.plot(kind='bar') #gera um grupo de barras agrupadas com base nos dados da tabela,
    #as colunas lung_cancer são representadas como barras empilhadas
    plt.title("Incidência de Câncer (Fumantes e não fumantes)")
    plt.xlabel("Fumante")
    plt.ylabel("Quantidade de Pessoas")
    plt.xticks(ticks=[0, 1], labels=["Não Fumante", "Fumante"], rotation=0) #alinha horizontalmente o eixo x
    
    plt.legend(title="Câncer", labels=["Sem Câncer", "Com Câncer"]) #adiona legenda
    
    plt.show()

fumante(dados)

#Objetivo do procedimento:
#1 - Agrupar os casos de câncer d epulmão por faixa etária
#2 - Somar o número de casos em cada faixa etária
#3 - criar um gráfico de barras que visualize a relação entre faixa etária e a incidência de câncer de pulmão
def casosPorIdade(dados):
    # Agrupar por idade e câncer
    idade = dados.groupby ("AGE") ['LUNG_CANCER'].sum().reset_index()#agrupa os dados das duas colunas
    #soma os valores da coluna lung_cancer para cada faixa etária, reseta o indice e tranforma em tabela com as 
    #colunas idade e câncer
    print(idade)

# Plotar o gráfico de barras agrupadas
    plt.bar(idade['AGE'],idade['LUNG_CANCER']) #cria um gráfico de barras com as colunas idade e câncer
    plt.xlabel("Faixa Etária")#adiciona rótulo ao eixo x
    plt.ylabel("Número de casos")#adiciona rótulo ao eixo y
    plt.title("Incidência de Câncer por idade") #adiciona título ao gráfico
    plt.show()

casosPorIdade(dados)