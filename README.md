PHP- Classes e Utilidades
=========================

//[INI] Referente ao arquivo classe de conexão com o postgresql --------------------------------------------------------

Classe de conexão com o banco Postgresql. Mantenha os créditos do autor por favor.

Não houve muito tempo para desenvolver 
a classe, caso alguém tenha alguma sugestão de melhora, mande para o e-mail que contém no código fonte.

Uso Básico:

        $DB = New DBE();
        
        $DB->Query($query);
        
        $DB->Fetch (tipo_fetch); ou $DB->Fetch ();
        
        $DB->LastId();
        
        $DB->Rows();
        
        $DB->RollBack();

//[INI] Referente ao arquivo mes_dia_por_extenso -----------------------------------------------------------------------

Exemplo prático: echo NomeDaSuaClasse::dataPorExtenso($data,"dia");

//[FIM] Referente ao arquivo mes_dia_por_extenso -----------------------------------------------------------------------
