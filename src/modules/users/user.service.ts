import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { User } from './user.entity';
import { Repository } from 'typeorm';

@Injectable()
export class UsersService {
  constructor(
    @InjectRepository(User)
    private usersRepo: Repository<User>,
  ) {}

  createUser(userData: Partial<User>) {
    const user = this.usersRepo.create(userData);
    return this.usersRepo.save(user);
  }

  findAll() {
    return this.usersRepo.find({ relations: ['tasks'] });
  }

  getUser(id: number) {
    return this.usersRepo.findOne({ where: { id }, relations: ['tasks'] });
  }

  async updateUser(id: number, updateData: Partial<User>) {
    await this.usersRepo.update(id, updateData);
    return this.getUser(id);
  }

  deleteUser(id: number) {
    return this.usersRepo.delete(id);
  }
}
