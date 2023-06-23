<?php
namespace MODEL;

class Produto {
    private ?int $id;
    private ?string $nome;
    private ?int $idCategoria;
    private ?float $valor;
    private ?int $quantidadeEstoque;

    public function __construct(?int $id = null, ?string $nome = null, ?int $idCategoria = null, ?float $valor = null, ?int $quantidadeEstoque = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->idCategoria = $idCategoria;
        $this->valor = $valor;
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getNome(): ?string {
        return $this->nome;
    }

    public function setNome(?string $nome): void {
        $this->nome = $nome;
    }

    public function getIdCategoria(): ?int {
        return $this->idCategoria;
    }

    public function setIdCategoria(?int $idCategoria): void {
        $this->idCategoria = $idCategoria;
    }

    public function getValor(): ?float {
        return $this->valor;
    }

    public function setValor(?float $valor): void {
        $this->valor = $valor;
    }

    public function getQuantidadeEstoque(): ?int {
        return $this->quantidadeEstoque;
    }

    public function setQuantidadeEstoque(?int $quantidadeEstoque): void {
        $this->quantidadeEstoque = $quantidadeEstoque;
    }
}
?>
