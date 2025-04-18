/**
 * Este projeto é uma implementação básica de um padrão MVC (Model-View-Controller) 
 * com algumas funcionalidades que se assemelham ao framework Laravel.
 *
 * Funcionalidades principais:
 * - Sistema de rotas: O sistema de rotas é inspirado no Laravel e é definido no arquivo `config/routes`.
 * - Debugging: Inclui pacotes como `whoops` para exibição de erros detalhados e `var-dump` para depuração.
 * - **Collections nas Views:** Agora é possível passar arrays para as views e eles serão automaticamente convertidos em instâncias de `Illuminate\Support\Collection`, permitindo o uso de métodos como `map`, `filter`, `first`, `pluck`, entre outros, diretamente nas views. Além disso, cada item do array é convertido recursivamente em objeto, facilitando o acesso às propriedades como `$usuario->nome`.
 * - **Suporte ao Twig:** O framework suporta o uso do Twig como mecanismo de template para as views, permitindo sintaxe moderna e recursos avançados de templates.
 *
 * Estrutura do projeto:
 * - Configuração de rotas no arquivo `config/routes`.
 * - Implementação modular seguindo o padrão MVC.
 *
 * Objetivo:
 * Este projeto serve como uma base para entender e implementar um padrão MVC simples, 
 * com recursos que facilitam o desenvolvimento e a depuração de aplicações web.
 *
 * ## Exemplo de uso de Collection na View
 * ```php
 * // Controller
 * $usuarios = [
 *     ['nome' => 'João'],
 *     ['nome' => 'Maria'],
 * ];
 * view('home', ['usuarios' => $usuarios]);
 * 
 * // View (home.php)
 * <?php foreach ($usuarios->map(fn($u) => strtoupper($u->nome)) as $nome): ?>
 *     <p><?= $nome ?></p>
 * <?php endforeach; ?>
 * ```
 */