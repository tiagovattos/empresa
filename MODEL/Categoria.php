<?php
namespace MODEL;

class Categoria {
    private ?int $id;
    private ?string $descricao;
    private ?int $qntdProdutos;

    public function __construct(?int $id = null, ?string $descricao = null, ?int $qntdProdutos = null) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->qntdProdutos = 0;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getDescricao(): ?string {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void {
        $this->descricao = $descricao;
    }

    public function getQntdProdutos(): ?int {
        return $this->qntdProdutos;
    }

    public function setQntdProdutos(?int $qntdProdutos): void {
        $this->qntdProdutos = $qntdProdutos;
    }
}
?>
