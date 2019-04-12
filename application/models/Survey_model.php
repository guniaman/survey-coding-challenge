<?php

class Survey_model extends CI_Model
{
    public const TABLE_NAME = 'survey';

    /** @var string */
    private $name;

    /** @var string */
    private $email;

    /** @var string */
    private $favorite_color;

    /** @var string */
    private $birth_date;

    /**
     * @param array $data
     * @return Survey_model
     * @throws Exception
     */
    public function initialize(array $data): self
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->favorite_color = $data['favorite_color'];

        if (isset($data['birth_date'])) {
            $this->set_birth_date($data['birth_date']);
        }

        return $this;
    }

    public function insert(): void
    {
        $this->db->insert(self::TABLE_NAME, $this->get_mapped_data());
    }

    /**
     * @return array
     */
    private function get_mapped_data(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'favorite_color' => $this->favorite_color,
            'birth_date' => $this->birth_date
        ];
    }

    /**
     * @param string $name
     * @return self
     */
    public function set_name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $email
     * @return self
     */
    public function set_email(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $favorite_color
     * @return self
     */
    public function set_favorite_color(string $favorite_color): self
    {
        $this->favorite_color = $favorite_color;
        return $this;
    }

    /**
     * @param string $birth_date
     * @return self
     * @throws Exception
     */
    public function set_birth_date(string $birth_date): self
    {
        $this->birth_date = $birth_date ? (new DateTime($birth_date))->format('Y-m-d') : null;
        return $this;
    }
}