
# Meu Projeto

## Iniciar um Projeto php

Para iniciar o projeto, use o seguinte comando:

```bash
composer init
```

### Configurações do Composer

Durante a configuração, serão solicitados os seguintes detalhes:

- **Package name (vendor/project):** Informe o nome do pacote no formato `vendor/nome-do-projeto` (ex: `wellington/meu-projeto`).
- **Description:** Escreva uma breve descrição do projeto.
- **Author:** Insira o seu nome e email no formato `Nome <email@exemplo.com>`.
- **Minimum Stability:** Pode deixar como `stable`, a menos que queira utilizar pacotes em desenvolvimento.
- **Package Type:** Deixe em branco para usar o padrão.
- **License:** Informe a licença do projeto (ex: `MIT`).
- **Define your dependencies:** Adicione as dependências do projeto, como pacotes de terceiros.
- **Define your dev dependencies:** Adicione dependências que só serão usadas em ambiente de desenvolvimento (opcional).

### Estrutura do Projeto

Após a inicialização, a estrutura do projeto será:

```
/seu-projeto
|-- composer.json
|-- vendor/
```

A pasta `vendor/` contém todos os pacotes instalados, e o `composer.json` gerencia as dependências do projeto.

### Autoloading

O Composer gera automaticamente um autoloader. Para incluir automaticamente as classes no seu projeto, use o seguinte código em seus arquivos PHP:

```php
require 'vendor/autoload.php';
```

Isso vai carregar todas as classes das dependências instaladas via Composer.
"# Php" 
