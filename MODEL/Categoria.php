<?php
namespace MODEL;

class Categoria {
    private ?int $id;
    private ?string $descricao;

    public function __construct(?int $id = null, ?string $descricao = null) {
        $this->id = $id;
        $this->descricao = $descricao;
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
}
?>
